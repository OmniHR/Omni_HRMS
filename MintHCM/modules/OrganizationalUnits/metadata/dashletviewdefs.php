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
 * Copyright (C) 2018-2019 MintHCM
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
if ( !defined('sugarEntry') || !sugarEntry ) {
   die('Not A Valid Entry Point');
}

global $current_user;

$dashletData['OrganizationalUnitsDashlet']['searchFields'] = array(
   'date_entered' => array( 'default' => '' ),
   'date_modified' => array( 'default' => '' ),
   'type' => array( 'default' => '' ),
   'parent_name' => array(
      'default' => '',
      'label' => 'LBL_MEMBER_OF',
   ),
   'assigned_user_name' => array(
      'default' => '',
      'label' => 'LBL_ASSIGNED_TO',
   ),
   'current_manager_name' => array(
      'default' => '',
   ),
);
$dashletData['OrganizationalUnitsDashlet']['columns'] = array(
   'name' => array(
      'width' => '20',
      'label' => 'LBL_LIST_NAME',
      'link' => true,
      'default' => true,
   ),
   'type' => array(
      'width' => '20',
      'label' => 'LBL_TYPE',
      'default' => true,
   ),
   'parent_name' => array(
      'name' => 'parent_name',
      'type' => 'relate',
      'link' => true,
      'label' => 'LBL_MEMBER_OF',
      'id' => 'PARENT_ID',
      'width' => '10%',
      'default' => true,
   ),
   'position_leader_name' => array(
      'name' => 'position_leader_name',
      'type' => 'relate',
      'link' => true,
      'label' => 'LBL_POSITION_LEADER_NAME',
      'id' => 'POSITION_LEADER_ID',
      'width' => '10%',
      'default' => true,
   ),
   'date_entered' => array(
      'width' => '15',
      'label' => 'LBL_DATE_ENTERED',
      'default' => false,
   ),
   'date_modified' => array(
      'default' => false,
      'width' => '15',
      'label' => 'LBL_DATE_MODIFIED',
   ),
   'created_by' => array(
      'default' => false,
      'width' => '8',
      'label' => 'LBL_CREATED',
   ),
   'assigned_user_name' => array(
      'default' => false,
      'width' => '8',
      'label' => 'LBL_LIST_ASSIGNED_USER',
   ),
   'current_manager_name' => array(
      'name' => 'current_manager_name',
      'type' => 'relate',
      'link' => true,
      'label' => 'LBL_CURRENT_MANAGER_NAME',
      'id' => 'CURRENT_MANAGER_ID',
      'width' => '10%',
      'default' => false,
   ),
);
