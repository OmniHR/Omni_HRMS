<?php

/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * MintHCM is a Human Capital Management software based on SuiteCRM developed by MintHCM,
 * Copyright (C) 2018-2023 MintHCM
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by SugarCRM"
 * logo and "Supercharged by SuiteCRM" logo and "Reinvented by MintHCM" logo.
 * If the display of the logos is not reasonably feasible for technical reasons, the
 * Appropriate Legal Notices must display the words "Powered by SugarCRM" and
 * "Supercharged by SuiteCRM" and "Reinvented by MintHCM".
 */
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

global $mod_strings, $app_strings, $sugar_config;
$module_name = 'Offboardings';
if (ACLController::checkAccess('OffboardingTemplates', 'edit', true)) {
    $module_menu[] = array(
        'javascript:generateOnboardingOffboarding.init(generateOnboardingOffboarding);',
        translate('LBL_GENERATE_BUTTON', 'OffboardingTemplates'),
        'Add',
        'OffboardingTemplates',
    );
}
if (ACLController::checkAccess($module_name, 'list', true)) {
    $module_menu[] = array(
        'index.php?module=Offboardings&action=index&return_module=Offboardings&return_action=DetailView',
        $mod_strings['LNK_LIST'],
        'View',
        $module_name,
    );
}
if (ACLController::checkAccess($module_name, 'import', true)) {
    $module_menu[] = array(
        'index.php?module=Import&action=Step1&import_module=Offboardings&return_module=Offboardings&return_action=index',
        $app_strings['LBL_IMPORT'],
        'Import',
        $module_name,
    );
}
if (ACLController::checkAccess('OffboardingTemplates', 'edit', true)) {
    $module_menu[] = array(
        'index.php?module=OffboardingTemplates&action=EditView&return_module=OffboardingTemplates&return_action=DetailView',
        translate('LNK_NEW_RECORD', 'OffboardingTemplates'),
        'Add',
        'OffboardingTemplates',
    );
}
if (ACLController::checkAccess('OffboardingTemplates', 'list', true)) {
    $module_menu[] = array(
        'index.php?module=OffboardingTemplates&action=index&return_module=OffboardingTemplates&return_action=DetailView',
        translate('LNK_LIST', 'OffboardingTemplates'),
        'View',
        'OffboardingTemplates',
    );
}