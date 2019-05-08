<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))              echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnText))                   echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_NOTIFICATION_ASSOCIATE_USER_FORM -->
<form name="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_FORM; ?>" method="post">
    <!-- FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL; ?>"
                class="<?php echo $this->ReturnCorporationNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          ResetOtherSelectValuesByForm('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_FORM; ?>',
                                                       '<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL; ?>');">
                <option <?php if ($this->InputValueNotificationForAll == "" 
                                  || $this->InputValueNotificationForAll == ConfigInfraTools::FIELD_SEL_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
                </option>
				<option <?php if ($this->InputValueNotificationForAll == ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL_VALUE_ALL) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL_VALUE_ALL; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL_VALUE_ALL'); ?> 
                </option>
            </select>
        </div>
    </div>
    <!-- FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ASSOCIATE_BY_CORPORATION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>"
                class="<?php echo $this->ReturnCorporationNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          ResetOtherSelectValuesByForm('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_FORM; ?>',
                                                       '<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>');">
                <option <?php if ($this->InputValueNotificationByCorporationName == "" 
                                  || $this->InputValueNotificationByCorporationName == ConfigInfraTools::FIELD_SEL_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
                </option>
                <?php 
                if(is_array($this->ArrayInstanceSelectNotificationByCorporation))
                {
                    foreach($this->ArrayInstanceSelectNotificationByCorporation as $key=>$selectNotificationByCorporation)
                    {
						echo "<option ";
                          if($this->InputValueNotificationByCorporationName == $selectNotificationByCorporation->GetCorporationName())
                            echo "selected='selected' ";
                        echo "value='" . $selectNotificationByCorporation->GetCorporationName() . "'>" 
							           . $selectNotificationByCorporation->GetCorporationName() . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <!-- FIELD_DEPARTMENT_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ASSOCIATE_BY_DEPARTMENT').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>"
                class="<?php echo $this->ReturnCorporationNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          ResetOtherSelectValuesByForm('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_FORM; ?>',
                                                       '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>');">
                <option <?php if ($this->InputValueNotificationByDepartmentName == "" 
                                  || $this->InputValueNotificationByDepartmentName == ConfigInfraTools::FIELD_SEL_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
                </option>
                <?php 
                if(is_array($this->ArrayInstanceSelectNotificationByDepartment))
                {
                    foreach($this->ArrayInstanceSelectNotificationByDepartment as $key=>$selectNotificationByDeparment)
                    {
						echo "<option ";
                          if($this->InputValueNotificationByCorporationName == $selectNotificationByDeparment->GetDepartmentName())
                            echo "selected='selected' ";
                        echo "value='" . $selectNotificationByDeparment->GetDepartmentName()            . " - " 
							           . $selectNotificationByDeparment->GetDepartmentCorporationName() . "'>" 
							           . $selectNotificationByDeparment->GetDepartmentName()            . " - "
							           . $selectNotificationByDeparment->GetDepartmentCorporationName() . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <!-- FIELD_ROLE_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ASSOCIATE_BY_ROLE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_ROLE_NAME; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_ROLE_NAME; ?>"
                class="<?php echo $this->ReturnCorporationNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_ROLE_NAME; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          ResetOtherSelectValuesByForm('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_FORM; ?>',
                                                       '<?php echo ConfigInfraTools::FIELD_ROLE_NAME; ?>');">
                <option <?php if ($this->InputValueNotificationByRole == "" 
                                  || $this->InputValueNotificationByRole == ConfigInfraTools::FIELD_SEL_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
                </option>
                <?php 
                if(is_array($this->ArrayInstanceSelectNotificationByRole))
                {
                    foreach($this->ArrayInstanceSelectNotificationByRole as $key=>$selectNotificationByRole)
                    {
						echo "<option ";
                          if($this->InputValueNotificationByCorporationName == $selectNotificationByRole->GetRoleName())
                            echo "selected='selected' ";
                        echo "value='" . $selectNotificationByRole->GetRoleName() . "'>" 
							           . $selectNotificationByRole->GetRoleName() . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <!-- FIELD_TEAM_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ASSOCIATE_BY_TEAM').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_TEAM_NAME; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_TEAM_NAME; ?>"
                class="<?php echo $this->ReturnNotificationByTeamNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_TEAM_NAME; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          ResetOtherSelectValuesByForm('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_FORM; ?>',
                                                       '<?php echo ConfigInfraTools::FIELD_TEAM_NAME; ?>');">
                <option <?php if ($this->InputValueNotificationByTeamName == "" 
                                  || $this->InputValueNotificationByTeamName == ConfigInfraTools::FIELD_SEL_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
                </option>
                <?php 
                if(is_array($this->ArrayInstanceSelectNotificationByTeam))
                {
                    foreach($this->ArrayInstanceSelectNotificationByTeam as $key=>$selectNotificationByTeam)
                    {
						echo "<option ";
                          if($this->InputValueNotificationByTeamName == $selectNotificationByTeam->GetTeamName())
                            echo "selected='selected' ";
                        echo "value='" . $selectNotificationByTeam->GetTeamName()   . " - " 
							           . $selectNotificationByTeam->GetTeamId()     . "'>" 
							           . $selectNotificationByTeam->GetTeamName()   . " - " 
							           . $selectNotificationByTeam->GetTeamId() . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer">
        <input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_ASSOCIATE_USER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_ASSOCIATE_USER_DISASSOCIATE'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>