<div class="row">
	<div class="span12">
		<h2 class="pull-left">View member</h2>
		<a href="/members/edit/<?php echo $member->id; ?>" class="btn btn-primary pull-right">Change Member Information</a>
	</div>
	
	<div class="span4">
		<h4>Member Tasks</h4>		
		<p>
			<a href="#" class="btn btn-primary">Download Membership Card <small>(as PDF)</small></a>
		</p>
		<p>
			<a href="#" class="btn">View RFID Tag ID <small>(For Lab Access)</small></a> 
		</p>
		
		<br>
		<h4>Membership Fee Payment</h4>
		<p>
			<a href="#" class="btn">Send Fortnox Invoice</a> 
			<a href="#" class="btn">Send PayPal Link</a> 
		</p>
		
		<br>
		<h4>Access list (ACL) <small>Click to switch state</small></h4>
		
		<?php foreach($this->dbconfig->acl as $acl => $desc) { ?>
			<a href="/members/acl_switch/<?php echo $member->id; ?>/<?php echo $acl; ?>" class="label<?php echo ($member->acl->{$acl} ? ' label-success' : ''); ?>">
				<?php echo $desc; ?>
			</a>
		<?php } ?>
	</div>

	<div class="span8">
		<h4>Profile</h4>
		
		<div class="row">
			<div class="span2">
				<img src="<?php echo gravatar($member->email, 160); ?>" class="img-polaroid">
				<center><small>Avatar by <a href="https://www.gravatar.com/">Gravatar</a></small></center>
			</div>
			
			<div class="span3">
				<p>
					<strong>Name:</strong><br>
					<?php echo $member->firstname; ?> <?php echo $member->lastname; ?>
				</p>
				
				<p>
					<strong>E-mail address:</strong><br>
					<a href="mailto:<?php echo $member->email; ?>"><?php echo $member->email; ?></a>
				</p>
				
				<?php if(!empty($member->mobile)) { ?>
				<p>
					<strong>Mobile:</strong><br>
					<a href="callto:<?php echo $member->mobile; ?>"><?php echo $member->mobile; ?></a>
				</p>
				<?php } ?>
				
				<?php if(!empty($member->phone)) { ?>
				<p>
					<strong>Alt. Phone:</strong><br>
					<a href="callto:<?php echo $member->phone; ?>"><?php echo $member->phone; ?></a>
				</p>
				
				<?php } if(!empty($member->skype)) { ?>
				<p>
					<strong>Skype:</strong><br>
					<a href="skype:<?php echo $member->skype; ?>?chat"><?php echo $member->skype; ?></a>
				</p>
				<?php } ?>
				
			</div>
			
			<div class="span3">
				
				<?php if(!empty($member->company)) { ?>
				<p>
					<strong>Company:</strong><br>
					<?php echo $member->company; ?> <?php if(!empty($member->orgno)) echo '('.$member->orgno.')'; ?>
				</p>
				<?php } ?>
				
				<p>
					<strong>Address:</strong><br>
					<?php echo (!empty($member->address) ? $member->address . '<br>' : ''); ?>
					<?php echo (!empty($member->address2) ? $member->address2 . '<br>' : ''); ?>
					<?php echo $member->zipcode; ?> <?php echo $member->city; ?>
					<?php echo (!empty($member->country) ? '<br>'.$this->dbconfig->countries->{$member->country} : ''); ?>
				</p>
				
				<p>
					<strong>Member since:</strong><br>
					<?php echo date('Y-m-d', $member->registered); ?>
				</p>
				
				<?php if(!empty($member->membership)) { ?>
				<p>
					<strong>Membership Due:</strong><br>
					<?php echo $member->membership; ?>
				</p>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<br>
<div class="row">
	<div class="span6">
		<h4>Member Projects</h4>
		<table class="table table-striped table-condensed">
			<thead>
				<tr>
					<th>Name</th>
					<th>Status</th>
					<th>Started</th>
					<th>URL</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Memeber Management System</td>
					<td><span class="label label-info">In development</span></td>
					<td>2012-12-01</td>
					<td><a>https://internal.makerspace.se/</a></td>
				</tr>
				<tr>
					<td>Fortnox API Library</td>
					<td><span class="label label-info">In development</span></td>
					<td>2013-01-12</td>
					<td><a>https://github.com/makerspace/fortnox</a></td>
				</tr>
			</tbody>
		</table>
		
		<br>
		<h4>Member Wall</h4>
		<p>
			* Comes later, maybe *
		</p>
	</div>
	
	<?php if(!empty($member->twitter)) { ?>
		<div class="span6">
			<h4>Tweets by @<?php echo $member->twitter; ?> <small>(ToDo: Make this pretty)</small></h4>
			<span id="member_tweets"></span>
			<script src="/assets/js/tweets.min.js"></script>
			<script src="//api.twitter.com/1/statuses/user_timeline.json?screen_name=<?php echo $member->twitter; ?>&callback=twitterCallback2&count=10"></script>
		</div>
	<?php } ?>
</div>