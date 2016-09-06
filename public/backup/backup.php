<?php
/*******************************************************************************
 *                      PHP Backup Script
 *******************************************************************************
 *      Author:     Vikas Patial
 *      Email:      admin@ngcoders.com
 *      Website:    http://www.ngcoders.com
 *
 *      File:       paypal.php
 *      Version:    1.0.0
 *      Copyright:  (c) 2007 - Vikas Patial
 *                  You are free to use, distribute, and modify this software 
 *                  under the terms of the GNU General Public License.  See the
 *                  included license.txt file.
 *      
 *******************************************************************************
 *      v1.0.0 [04.10.2007] - Initial Version
 *
 *******************************************************************************
 *  DESCRIPTION:
 *
 *      NOTE: See www.ngcoders.com for the most recent version of this script 
 *      and its usage.
 *
 *******************************************************************************
*/

include('config.php');
include('functions.php');

$backupName = "backup-".date('d-m-y H-i-s').'.zip';

$createZip = new createZip;

if (isset($configBackup) && is_array($configBackup) && count($configBackup)>0)
{

    // Lets backup any files or folders if any

    foreach ($configBackup as $dir)
    {
        $basename = basename($dir);

        // dir basename
        if (is_file($dir))
        {
            $fileContents = file_get_contents($dir);
            $createZip->addFile($fileContents,$basename);
        }
        else
        {

            $createZip->addDirectory($basename."/");

            $files = directoryToArray($dir,true);

            $files = array_reverse($files);

            foreach ($files as $file)
            {

                $zipPath = explode($dir,$file);
                $zipPath = $zipPath[1];

                // skip any if required

                $skip =  false;
                foreach ($configSkip as $skipObject)
                {
                    if (strpos($file,$skipObject) === 0)
                    {
                        $skip = true;
                        break;
                    }
                }

                if ($skip) {
                    continue;
                }


                if (is_dir($file))
                {
                    $createZip->addDirectory($basename."/".$zipPath);
                }
                else
                {
                    $fileContents = file_get_contents($file);
                    $createZip->addFile($fileContents,$basename."/".$zipPath);
                }
            }
        }

    }

}

if (isset($configBackupDB) && is_array($configBackupDB) && count($configBackupDB)>0)
{
    
     foreach ($configBackupDB as $db)
     {
         $backup = new MySQL_Backup(); 
         $backup->server   = $db['server'];
         $backup->username = $db['username'];
         $backup->password = $db['password'];
         $backup->database = $db['database'];
         $backup->tables   = $db['tables'];
         
         $backup->backup_dir = $configBackupDir;
         
         $sqldump = $backup->Execute(MSB_STRING,"",false);

         $createZip->addFile($sqldump,$db['database'].'-sqldump.sql');
         
     }

}

$fileName = $configBackupDir.$backupName;
$fd = fopen ($fileName, "wb");
$out = fwrite ($fd, $createZip -> getZippedfile());
fclose ($fd);

// Dump done now lets email the user 

if (isset($configEmail) && !empty($configEmail)) 
{
    mailAttachment($fileName,$configEmail,'webdesign@powerpgs.com','Backup Script','webdesign@powerpgs.com','Window World Tickets - Full Database Backup - '.$backupName,"Backup file is attached");
}