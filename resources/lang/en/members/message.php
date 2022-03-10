<?php
/**
* Language file for Member error/success messages
*
*/

return array(

    'member_exists'              => 'Member already exists!',
    'member_not_found'           => 'Member [:id] does not exist.',
    'member_login_required'      => 'The login field is required',
    'member_password_required'   => 'The password is required.',
    'insufficient_permissions' => 'Insufficient Permissions.',
    'banned'              => 'banned',
    'suspended'             => 'suspended',

    'success' => array(
        'create'    => 'Member was successfully created.',
        'update'    => 'Member was successfully updated.',
        'delete'    => 'Member was successfully deleted.',
        'disable'   => 'Member was successfully disabled.',
        'ban'       => 'Member was successfully banned.',
        'unban'     => 'Member was successfully unbanned.',
        'suspend'   => 'Member was successfully suspended.',
        'unsuspend' => 'Member was successfully unsuspended.',
        'restored'  => 'Member was successfully restored.'
    ),

    'error' => array(
        'create'    => 'There was an issue creating the member. Please try again.',
        'update'    => 'There was an issue updating the member. Please try again.',
        'delete'    => 'There was an issue deleting the member. Please try again.',
        'unsuspend' => 'There was an issue unsuspending the member. Please try again.'
    ),

);
