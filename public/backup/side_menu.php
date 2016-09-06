		<?php 

// Determine page content
$rURI = $_SERVER['REQUEST_URI'];
$rURI = str_replace(".htm","",$rURI);
$rURI = explode("?",$rURI); // divide out query string
$query_string = $rURI[1];
$URI = explode("/",$rURI[0]);
$URI['full'] = rtrim($rURI[0],'/');
$uri_count = count($URI);

 ?>

		<!-- Begin Left Column -->
			<div id="leftcolumn"> 
				<?php
				$id = $_GET['id'];
				$sql= "SELECT companyLogo,companyName,companyID,companyTAG FROM companyprofile WHERE companyID = $id";
				$stmt = $db->query($sql); 
				$row =$stmt->fetchObject();
				?>			
				
				<div id="companyname">
					<a href="/contacts.php?id=<?php echo $id?>">
	                <img src="/_dashboard/image_upload/uploads/<?php echo $row->companyLogo?>" alt="" title="<?php echo $row->companyName?>"/></a>
	            </div>
				

				
					<ul id="navigation">
						<li id="contact-list-icon" class="<?php if ($URI[1] == "contacts.php"){ echo "side-active";} elseif ($URI[1] == "contacts") { echo "side-active";}?>"><a   href="/contacts.php?id=<?php echo $row->companyID ?>"><span></span>Contacts</a></li>
						<li id="entries-list-icon" class="<?php if ($URI[1] == "emails.php"){ echo "side-active";}  elseif ($URI[1] == "emails") { echo "side-active";}?>"><a href="/emails.php?id=<?php echo $row->companyID ?>"><span></span>Emails</a></li>
						<li id="entries-list-icon" class="<?php if ($URI[1] == "notes.php"){ echo "side-active";}  elseif ($URI[1] == "notes") { echo "side-active";}?>"><a href="/notes.php?id=<?php echo $row->companyID ?>"><span></span>Dated Entries</a></li>
						<li id="logins-list-icon" class="<?php if ($URI[1] == "logins.php"){ echo "side-active";} ?>"><a  href="/logins.php?id=<?php echo $row->companyID ?>"><span></span>Logins</a></li>
						<li id="work-list-icon" class="<?php if ($URI[1] == "work-orders.php"){ echo "side-active";} ?>"><a  href="/work-orders.php?id=<?php echo $row->companyID ?>"><span></span>Work Orders</a></li>
						<li id="entries-list-icon" class="<?php if ($URI[1] == "databases.php"){ echo "side-active";}  elseif ($URI[1] == "databases") { echo "side-active";}?>"><a href="/databases.php?id=<?php echo $row->companyID ?>"><span></span>Databases</a></li>
						<li id="entries-list-icon" class="<?php if ($URI[1] == "customer-report.php"){ echo "side-active";}  elseif ($URI[1] == "customer-report") { echo "side-active";}?>"><a href="/customer-report.php?id=<?php echo $row->companyID ?>"><span></span>Customer Report</a></li>
						<li id="domain-list-icon" class="<?php if ($URI[1] == "domain-list.php"){ echo "side-active";}?>"><a  href="/domain-list.php?id=<?php echo $row->companyID ?>"><span></span>Domains</a>


<?php if ($URI[1] == "domains"){ 

				$navDomain = $_GET['domainID'];

	?>

<ul>
	<li <?php if ($URI[2] == "domain-overview.php"){ echo "class='side-active'";}?>><a href="/domains/domain-overview.php?domainID=<?php echo $navDomain ?>&id=<?php echo $row->companyID?>" alt="">Overview</a></li>
	<li <?php if ($URI[2] == "hosting.php"){ echo "class='side-active'";}?>><a href="/domains/hosting.php?domainID=<?php echo $navDomain ?>&id=<?php echo $row->companyID?>" alt="">Hosting</a></li>
	<li <?php if ($URI[2] == "billing.php"){ echo "class='side-active'";}?>><a href="/domains/billing.php?domainID=<?php echo $navDomain ?>&id=<?php echo $row->companyID?>" alt="">Billing</a></li>
	<li <?php if ($URI[2] == "domain-products.php"){ echo "class='side-active'";}?>><a href="/domains/domain-products.php?domainID=<?php echo $navDomain ?>&id=<?php echo $row->companyID?>" alt="">Domain Products</a></li>
</ul>

<?
}?>




						</li>
					</ul>








			<div id="phone-msg-success"></div>

			<form id="phone-msg" method="post" action="phone-email.php" >
				<input type="hidden" name="companyID" value="<?php echo $row->companyID ?>">
				<input type="hidden" name="companyTAG" value="<?php echo $row->companyTAG ?>">
				<input type="hidden" name="companyName" value="<?php echo $row->companyName ?>">

				<h2>Phone Message</h2>
				<label class="check-right">
				Urgent<input type="checkbox" name="urgent" value="Yes"><br/>
				</label>


				<label style="margin-top:25px;">
				   Contact
		              <select name="adminContact" id="filter_selection">

			                <?php
			                  $sql = $db->query("SELECT contactID,lastName,firstName FROM companycontacts WHERE companyID = $row->companyID ORDER BY lastName ASC");  


			                  $sql->setFetchMode(PDO::FETCH_OBJ);
			                  
			                  while($domain = $sql->fetch()) 
			                   {  ?>
			                  <option value="<?php echo $domain->firstName?> <?php echo $domain->lastName ?>" ><?php echo $domain->firstName?> <?php echo $domain->lastName ?></option>
			                  <?  }  ?>
			                  <option value="new">New Contact</option>
		              </select>
				</label>

<div id="contactName">
				<label>
					First Name
					<input type="text" name="fname">
				</label>

				<label>
					Last Name
					<input type="text" name="lname">
				</label>
</div>
<label>Contacted you by<br/>
					<input type="checkbox" name="contacthow[]" value="Telephoned">Telephoned<br/>
					<input type="checkbox" name="contacthow[]" value="Came to see you">Came to see you<br/>
					<input type="checkbox" name="contacthow[]" value="Returned your call">Returned your call<br/>
					<input type="checkbox" name="contacthow[]" value="Please Call">Please Call<br/>
					<input type="checkbox" name="contacthow[]" value="Will call again">Will call again<br/>
					<input type="checkbox" name="contacthow[]" value="Wants to see you">Wants to see you<br/>
</label>

<label>
				  <select name="assignEmployee">
                        <option value="">N/A</option>
                        <option value="JGS">JGS</option>
                        <option value="RCN">RCN</option>
                        <option value="JCA">JCA</option>
                        <option value="BBN">BBN</option>
                        <option value="LJP">LJP</option>
                        <option value="SDD">SDD</option>
                         <option value="AJB">AJB</option>
                        <option value="JMB">JMB</option>
                        <option value="AMK">AMK</option>

		              </select> is currently working with another customer.
		          </label>

		          <label id="add-cc">Add CC Contacts</label>

<div id="cc-contacts">

<label>
                        <input type="checkbox" name="member[]" value="Support@PowerPGS.com" />Web Department<br/>
                        <input type="checkbox" name="member[]" value="Tech@PowerPGS.com" />Tech Department<br/>
                        <input type="checkbox" name="member[]" value="Info@PowerPGS.com" />Web Info<br/>
                        <input type="checkbox" name="member[]" value="Design@PowerPGS.com" />Web Design<br/>
                        <input type="checkbox" name="member[]" value="JAvidano@PowerPGS.com" />John A.<br/>
                        <input type="checkbox" name="member[]" value="Lacey@PowerPGS.com" />Lacey P.<br/>
                        <input type="checkbox" name="member[]" value="WebDesign@PowerPGS.com" />Scott D.<br/>
                        <input type="checkbox" name="member[]" value="Accounting@PowerComputingInc.com" />Accounting<br/>
                        <input type="checkbox" name="member[]" value="JBrown@PowerComputingInc.com" />Joanie B.<br/>
                        <input type="checkbox" name="member[]" value="JMStappert@PowerComputingInc.com" />Janie S.<br/>
                        <input type="checkbox" name="member[]" value="JStappert@PowerComputingInc.com" />John S.<br/>
                        <input type="checkbox" name="member[]" value="MBlomenberg@PowerComputingInc.com" />Matt B.<br/>
                        <input type="checkbox" name="member[]" value="HKahlo@PowerComputingInc.com" />Heidi K.<br/>
                        <input type="checkbox" name="member[]" value="AStappertg@PowerComputingInc.com" />Andy S.


</label>
</div>


<label>
				What is the best number to reach you at?
				<input type="text" name="phone">
</label>
<label>
				What is your email address? <input type="text" name="email">
</label>
<label>Is this an IT or Web issue?
				<select name="department">
					<option value="Web">Web</option>
					<option value="Tech">IT</option>
				</select>
</label>
<label>
				I may be able to help you, what do you need help with? <textarea name="help"></textarea>
</label>
<label>
				Subject: <textarea name="specific"></textarea><br>
</label>
<label>
				Details: <textarea name="addDetails"></textarea><br>
</label>

<label>Copy to Dated Entries
	<input type="checkbox" name="copy" value="copy">
</label>

					<input type="hidden" name="time">

					<input type="submit" value="Send">
			</form>



			</div>
