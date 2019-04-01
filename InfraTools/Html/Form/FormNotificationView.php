<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnText))             echo $this->ReturnText; ?>
		<?php if(isset($this->ReturnNotificationId))   echo $this->ReturnNotificationId; ?>
		<?php if(isset($this->ReturnNotificationText)) echo $this->ReturnNotificationText; ?>
		<?php if(isset($this->ReturnNotificationActive)) echo $this->ReturnNotificationActive; ?>
	</label>
</div>
<!-- FM_NOTIFICATION_VIEW -->
<form name="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW; ?>" method="post" >
    <!-- FIELD_NOTIFICATION_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php  echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueNotificationId; ?></label>
        </div>
    </div>
    <!-- FIELD_NOTIFICATION_TEXT -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_TEXT').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueNotificationText; ?></label>
        </div>
    </div>
    <?php if($this->Page == str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_NOTIFICATION)) 
	{
	?>
		<!-- FIELD_NOTIFICATION_ACTIVE -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ACTIVE').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent">
					<?php
						echo "<img src='" . $this->InputValueNotificationActiveIcon . "' 
							   name='"    . $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ACTIVE') . "'
							   alt='NotificationActive' width='20' height='20' />";
					?>
				</label>
			</div>
		</div>
    <?php 
	}
	else 
	{
	?>
    	<!-- FIELD_ASSOC_USER_NOTIFICATION_READ -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_ASSOC_USER_NOTIFICATION_READ').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent">
					<?php
						echo "<img src='" . $this->InputValueAssocUserNotificationRead . "' 
							   name='"    . $this->InstanceLanguageText->GetText('FIELD_ASSOC_USER_NOTIFICATION_READ') . "'
							   alt='NotificationActive' width='20' height='20' />";
					?>
				</label>
			</div>
		</div>
    <?php 
	}
	?>
    <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGISTER_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegisterDate; ?></label>
        </div>
    </div>
 </form>
<!-- SUBMIT -->
<?php if($this->Page == str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_NOTIFICATION)) 
{
?>
	<div class="DivContentBodyContainer">
		<!-- FM_NOTIFICATION_VIEW_UPDT -->
		<form name="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_UPDT; ?>" 
			  id="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_UPDT; ?>" 
			  class="DivFormHorizontalButtons"
			  method="post" >
			<input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_UPDT_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_UPDT_SB; ?>"
								 class="DivContentBodySubmitBigger"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT'); ?>"/>
		</form>
		<!-- FM_NOTIFICATION_VIEW_DEL -->
		<form name="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_DEL; ?>" 
			  id="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_DEL; ?>" 
			  class="DivFormHorizontalButtons"
			  method="post" >
			<input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_DEL_SB; ?>" 
					   id="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_DEL_SB; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DEL'); ?>"
				   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
		</form>
		<!-- FM_NOTIFICATION_VIEW_LST_USERS -->
		<form name="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS; ?>" 
			  id="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS; ?>" 
			  class="DivFormHorizontalButtons"
			  method="post" >
			<input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB; ?>" 
					   id="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LST_USERS'); ?>"/>
		</form>
		<!-- FM_NOTIFICATION_VIEW_ASSOCIATE_USERS -->
		<form name="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_ASSOCIATE_USERS; ?>" 
			  id="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_ASSOCIATE_USERS; ?>" 
			  class="DivFormHorizontalButtons"
			  method="post" >
			<input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_ASSOCIATE_USERS_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_NOTIFICATION_VIEW_ASSOCIATE_USERS_SB; ?>"
								 class="DivContentBodySubmitBigger"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_ASSOCIATE_USERS'); ?>"/>
		</form>
	</div>
<?php } ?>