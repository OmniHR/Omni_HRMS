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

/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/06_Customer_Center/10_Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
$module_name = 'Candidatures';
$viewdefs[$module_name]['EditView'] = array(
    'templateMeta' => array(
        'includes' => array(
            array(
                'file' => 'modules/Candidatures/js/view.edit.js',
            ),
        ),
        'maxColumns' => '2',
        'widths' => array(
            array('label' => '10', 'field' => '30'),
            array('label' => '10', 'field' => '30'),
        ),
    ),
    'panels' => array(
        'LBL_RECORDVIEW_PANEL3' => array(
            array(
                'status',
                'to_decision',
            ),
            array(
                'work_start',
                'training_date',
            ),
            array(
                'reason_for_rejection',
            ),
            array(
                'parent_name',
                array(
                    'name' => 'recruitment_name',
                    'displayParams' => array(
                        'call_back_function' => 'recruitmentNameCallBack',
                    ),
                ),
            ),
            array(
                'start_date',
                'recruitment_end_name',
            ),
            array(
                'status_information',
            ),
            array(
                'entry_interview',
            ),
            array(
                'source',
                'task_grade',
            ),
            array(
                'scoring',
                '',
            ),
        ),
        'LBL_RECORDVIEW_PANEL5' => array(
            array(
                'employment_form',
            ),
            array(
                'dg_amount',
                'currency_id',
            ),
            array(
                'net_amount',
                'gross_amount',
            ),
            array(
                'notice',
            ),
        ),
        'LBL_RECORDVIEW_PANEL4' => array(
            array(
                'final_employment_form',
                'salary_net',
            ),
            array(
                'notice_final_expectations',
            ),
        ),
        'LBL_SHOW_MORE_INFORMATION' => array(
            array(
                'employee_name',
                'assigned_user_name',
            ),
            array(
                'description',
            ),
        ),
    ),
);
