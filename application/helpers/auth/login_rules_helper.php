<?php

    function getLoginRules() {
        return array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => '%s is required' 
                )
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => '%s is required' 
                )
            )
        );
    }