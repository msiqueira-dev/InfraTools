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
<!-- FM_NOTIFICATION_ASSOCIATE_USERS_FORM -->
<form name="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_FORM; ?>" method="post">
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
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
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
    <!-- FIELD_NOTIFICATION_ASSOCIATE_BY_CORPORATION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ASSOCIATE_BY_CORPORATION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_CORPORATION; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_CORPORATION; ?>"
                class="<?php echo $this->ReturnCorporationNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_CORPORATION; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
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
    <!-- FIELD_NOTIFICATION_ASSOCIATE_BY_DEPARTMENT -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ASSOCIATE_BY_DEPARTMENT').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_DEPARTMENT; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_DEPARTMENT; ?>"
                class="<?php echo $this->ReturnCorporationNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_DEPARTMENT; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
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
                        echo "value='" . $selectNotificationByDeparment->GetDepartmentName() . "'>" 
							           . $selectNotificationByDeparment->GetDepartmentName() . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <!-- FIELD_NOTIFICATION_ASSOCIATE_BY_ROLE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ASSOCIATE_BY_ROLE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_ROLE; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_ROLE; ?>"
                class="<?php echo $this->ReturnCorporationNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_ROLE; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
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
    <!-- FIELD_NOTIFICATION_ASSOCIATE_BY_TEAM -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ASSOCIATE_BY_TEAM').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_TEAM; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_TEAM; ?>"
                class="<?php echo $this->ReturnNotificationByTeamNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_BY_TEAM; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
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
                        echo "value='" . $selectNotificationByTeam->GetTeamName() . "'>" 
							           . $selectNotificationByTeam->GetTeamName() . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer">
        <input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_SB; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USERS_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>