<?php

/**** rename this file to default.php and overwrite the file in joomla_dir/templates/your-template/html/com_users/registration/default.php ****/

/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
?>
	<!-- Section -->
	<div class="page-default typo-dark" style="	padding-top: 20px;">
		<!-- Container -->
		<div class="container">
			<!-- Row -->
			<div class="row">
				<div class="col-md-offset-3 col-md-6 parent-has-overlay">
					<ul class="template-box box-login">
						<!-- Page Template Content -->
						<li class="template-content text-left">
							<div class="contact-form">
								<!-- Form Begins -->
								<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
								<h3>Register a new account</h3>
									
									<?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one.?>
					<?php $fields = $this->form->getFieldset($fieldset->name);?>
					<?php if (count($fields)):?>
						<?php foreach ($fields as $field) :// Iterate through the fields in the set and display them.?>
							<?php if ($field->hidden):// If the field is hidden, just display the input.?>
								<?php echo $field->input;?>
							<?php else:?>
								<div class="input-text form-group">
								<?php if ($field->type != 'Spacer') : ?>
									<?php echo $field->label; ?>
									<br>
									<?php echo $field->input;?>
								<?php endif; ?>
									
								</div>
							<?php endif;?>
						<?php endforeach;?>
					<?php endif;?>
				<?php endforeach;?>
								
								<div id="domainwarning" class="alert alert-danger" role="alert" style="display: none;">
									Email domain not allowed.
								</div>
									<!-- Button -->
									<button id="submit" class="btn btn-block" type="submit"><?php echo JText::_('JREGISTER');?></button>
									<?php echo JHtml::_('form.token');?>
								</form><!-- Form Ends -->
							</div>	
						</li><!-- Page Template Content -->
					</ul>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->	
	</div><!-- Page Default -->



<script>
var blockeddomains = [
"maildrop.cc",
"guerrillamail.com",
"guerrillamailblock.com",
"sharklasers.com",
"sharkalasers.com",
"guerrillamail.net",
"guerrillamail.org",
"guerrillamail.biz",
"spam4.me",
"grr.la",
"guerrillamail.de",
"mailmetrash.com",
"mt2014.com",
"mytrashmail.com",
"drdrb.net",
"mailinator.com",
"mailexpire.com",
"maileater.com",
"jetable.org",
"yourdomain.com",
"trillianpro.com",
"tempeMail.net",
"spamfree24.org",
"pookmail.com",
"mintemail.com",
"tempinbox.com",
"dingbone.com",
"fudgerub.com",
"lookugly.com",
"smellfear.com",
"sneakemail.com",
"spamgourmet.com",
"spamavert.com",
"mailnull.com",
"e3ward.com",
"mytempemail.com",
"incognitomail.org",
"mailcatch.com",
"deadaddress.com",
"lifebyfood.com",
"spamobox.com",
"anonymbox.com",
"yopmail.com",
"tempymail.com",
"mmmmail.com",
"temp-mail.org",
"coldemail.info",
"burstmail.info",
"solvemail.info",
"mailtemp.info",
"reallymymail.com",
"mailtothis.com",
"tempemail.net",
"guerillamailblock.com",
"tempemail.co.za",
"dodgeit.com",
"e4ward.com",
"you.e4ward.com",
"kasmail.com",
"spam.la",
"mailmoat.com",
"netmails.net",
"spammote.com",
"trashmail.net",
"kurzepost.de",
"objectmail.com",
"proxymail.eu",
"rcpt.at",
"trash-mail.at",
"trashmail.at",
"trashmail.me",
"trashmail.net",
"wegwerfmail.de",
"wegwerfmail.net",
"wegwerfmail.org",
"meltmail.com",
"mailnesia.com",
"fakeinbox.com",
"paplease.com",
"meltmail.com",
"mailinator.com",
"fakeinbox.com",
"6paq.com",
"easytrashmail.com",
"opayq.com",
"33mail.com",
"trashmail.net",
"kurzepost.de",
"objectmail.com",
"proxymail.eu",
"rcpt.at",
"trash-mail.at",
"trashmail.at",
"trashmail.me",
"wegwerfmail.de",
"wegwerfmail.net",
"wegwerfmail.org",
"spambog.com",
"spambog.de",
"spambog.ru",
"discardmail.com",
"discardmail.de",
"0815.ru",
"s0ny.net",
"hulapla.de",
"bund.us",
"teewars.org",
"brennendesreich.de",
"ama-trans.de",
"ama-trade.de",
"malahov.de",
"e-postkasten.eu",
"lags.us",
"e-postkasten.info",
"e-postkasten.de",
"e-postkasten.com",
"spammotel.com",
"dea.spamcon.org",
"despammed.com",
"forward.cat",
"shitmail.com",
"crapmail.com",
"mailinator.com",
"nowmymail.com",
"noclickemail.com",
"gishpuppy.com",
"monumentmail.com"
];

$('#jform_username').on('input', function() {
  //$('#jform_name').val( this.value );
  $('#jform_email1').val( this.value );
  $('#jform_email2').val( this.value );
  
  lowerthisvalue = this.value.toLowerCase();  
  loweremail = lowerthisvalue.split('@');
  if(  blockeddomains.indexOf(loweremail[1]) > -1  ) {
	$('#submit').hide();
	$('#domainwarning').show();
  }
  else {
	$('#submit').show();
	$('#domainwarning').hide();
  }
});

$('#jform_password1').on('input', function() {
  $('#jform_password2').val( this.value );
});

$( "#submit" ).click(function() {
  fillthemall();
});


function fillthemall() {
	var giouser = $('#jform_username').val();
	$('#jform_email1').val(giouser);
	$('#jform_email2').val(giouser);
	lowerthisvalue = giouser.toLowerCase();
	loweremail = lowerthisvalue.split('@');
  if(  blockeddomains.indexOf(loweremail[1]) > -1  ) {
	$('#submit').hide();
	$('#domainwarning').show();
  }
  else {
	$('#submit').show();
	$('#domainwarning').hide();
  }
  var pasgouornt = $('#jform_password1').val();
  $('#jform_password2').val(pasgouornt);
}

$('#jform_password2').parent().css('display', 'none');
$('#jform_email1').parent().css('display', 'none');
$('#jform_email2').parent().css('display', 'none');
</script>
