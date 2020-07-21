<?php
return [
    'order_received' => [
            'title' => 'New Order Received',
            'subject' => 'Great!, We have received your order and currently processing it',
            'icon' => 'https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png',
            'action_heading_text' => 'Track the order status',
            'action_btn_text'=>'Track Your Order',
            'btn_link' => 'https://google.com/mailing'
    ],

    'account_activation' => [
        'title' => 'Activate Your Account',
        'subject' => 'Thank you for signing up, the next step is to activate your account',
        'icon' => 'https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png',
        'action_heading_text' => 'Activate your account using the link below',
        'action_btn_text'=>'Activate your account',
        'btn_link' => env('APP_URL') . '/account-activation?verify='.base64_encode('["name"=>"paul"]')
    ],

];
