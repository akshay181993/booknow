<?php 
$config = array(
	'login_rules'  => [

                        [
                                'field' => 'password',
                                'label' => 'Password',
                                'rules' => 'trim|required'
                        ],

                        [

                                'field' => 'email',
                                'label' => 'Email Address',
                                'rules' => 'trim|required|valid_email'
                        ]
                ],
        'profile_rules'  => [

                        [
                                'field' => 'name',
                                'label' => 'Name',
                                'rules' => 'trim|required'
                        ],

                        [

                                'field' => 'email',
                                'label' => 'Email Address',
                                'rules' => 'trim|required|valid_email'
                        ],
                        [

                                'field' => 'mobile_no',
                                'label' => 'Mobile No',
                                'rules' => 'trim|required'
                        ],
                       
                ],
        'adduser_rules'  => [

                        [
                                'field' => 'name',
                                'label' => 'Name',
                                'rules' => 'trim|required'
                        ],

                        [

                                'field' => 'email',
                                'label' => 'Email Address',
                                'rules' => 'trim|required|valid_email'
                        ],
                        [

                                'field' => 'mobile_no',
                                'label' => 'Mobile Number',
                                'rules' => 'trim|required'
                        ],
                        [

                                'field' => 'password',
                                'label' => 'Password',
                                'rules' => 'trim|required'
                        ],
                        [

                                'field' => 'role',
                                'label' => 'Role',
                                'rules' => 'trim|required'
                        ]
                ],
        'password_reset_rules'   => [

                                [
                                        'field' => 'old_password',
                                        'label' => 'Old Password',
                                        'rules' => 'trim|required'
                                ],

                                [

                                        'field' => 'new_password',
                                        'label' => 'New Password',
                                        'rules' => 'trim|required'
                                ],
                                [

                                        'field' => 'confirm_password',
                                        'label' => 'Confirm Password',
                                        'rules' => 'trim|required|matches[new_password]'
                                ]
                        ],
        'projects_rules'  => [

                        [
                                'field' => 'project_name',
                                'label' => 'Project Name',
                                'rules' => 'trim|required'
                        ],

                        [

                                'field' => 'city_name',
                                'label' => 'City',
                                'rules' => 'trim|required'
                        ],
                        [

                                'field' => 'location',
                                'label' => 'Location',
                                'rules' => 'trim|required'
                        ]
                ],
        'buildings_rules'  => [

                        [
                                'field' => 'building_name[]',
                                'label' => 'Building Name',
                                'rules' => 'trim|required'
                        ],

                        [

                                'field' => 'project_name',
                                'label' => 'Project Name',
                                'rules' => 'trim|required'
                        ]
                ],
         'users_rules'  => [

                        [
                                'field' => 'name',
                                'label' => 'Name',
                                'rules' => 'trim|required'
                        ],

                        [

                                'field' => 'email',
                                'label' => 'Email Address',
                                'rules' => 'trim|required|valid_email'
                        ],
                        // [

                        //         'field' => 'password',
                        //         'label' => 'Password',
                        //         'rules' => 'trim|required'
                        // ],
                        [

                                'field' => 'role',
                                'label' => 'Role',
                                'rules' => 'trim|required'
                        ],
                        [

                                'field' => 'project_name',
                                'label' => 'Project Name',
                                'rules' => 'trim|required'
                        ],
                        [

                                'field' => 'building_name',
                                'label' => 'Building Name',
                                'rules' => 'trim|required'
                        ],

                ],
        'forgot_rules'  => [

                        [
                                'field' => 'email',
                                'label' => 'Email Address',
                                'rules' => 'trim|required|valid_email'
                        ]                       
                ],
        'layout_rules'  => [

                        [
                                'field' => 'project_name',
                                'label' => 'Project Name',
                                'rules' => 'trim|required'
                        ],
                        // [
                        //         'field' => 'project_layout',
                        //         'label' => 'Project Layout',
                        //         'rules' => 'required'
                        // ]                     
                ],
        'flats_rules'  => [

                        [
                                'field' => 'project_name',
                                'label' => 'Project Name',
                                'rules' => 'trim|required'
                        ],   
                        [
                                'field' => 'building_name',
                                'label' => 'Building Name',
                                'rules' => 'trim|required'
                        ],
                        [
                                'field' => 'flat_no[]',
                                'label' => 'Flat No',
                                'rules' => 'trim|required'
                        ],
                        [
                                'field' => 'flat_cost[]',
                                'label' => 'Cost',
                                'rules' => 'trim|required'
                        ],
                        [
                                'field' => 'view[]',
                                'label' => 'Flat View',
                                'rules' => 'trim|required'
                        ],   
                        [
                                'field' => 'flat_area[]',
                                'label' => 'Flat View',
                                'rules' => 'trim|required'
                        ],
                        [
                                'field' => 'flat_type[]',
                                'label' => 'Flat Type',
                                'rules' => 'trim|required'
                        ]              
                ],

        );

?>