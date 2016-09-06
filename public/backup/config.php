<?php

// Which directory/files to backup ( directory should have trailing slash ) 

$configBackup = array('../files');

// which directories to skip while backup 

$configSkip   = array('backup/');  

// Put backups in which directory 

$configBackupDir = 'backup/';

//  Databses you wish to backup , can be many ( tables array if contains table names only those tables will be backed up ) 

$configBackupDB[] = array('server'=>'sql5c0c.megasqlservers.com','username'=>'windowworl806950','password'=>'W1n0rd3rs*','database'=>'server_windowworldtickets_com','tables'=>array());

// Put in a email ID if you want the backup emailed 

$configEmail = 'webdesign@powerpgs.com';