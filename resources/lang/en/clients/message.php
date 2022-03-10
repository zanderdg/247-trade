<?php
/**
* Language file for Client error/success messages
*
*/

return array(

    'client_exists'              => 'Client already exists!',
    'client_not_found'           => 'Client [:id] does not exist.',
    'client_login_required'      => 'The login field is required',
    'client_password_required'   => 'The password is required.',
    'insufficient_permissions' => 'Insufficient Permissions.',
    'banned'              => 'banned',
    'suspended'             => 'suspended',

    'success' => array(
        'create'    => 'Client was successfully created.',
        'update'    => 'Client was successfully updated.',
        'delete'    => 'Client was successfully deleted.',
        'disable'   => 'Client was successfully disabled.',
        'ban'       => 'Client was successfully banned.',
        'unban'     => 'Client was successfully unbanned.',
        'suspend'   => 'Client was successfully suspended.',
        'unsuspend' => 'Client was successfully unsuspended.',
        'restored'  => 'Client was successfully restored.'
    ),

    'error' => array(
        'create'    => 'There was an issue creating the member. Please try again.',
        'update'    => 'There was an issue updating the member. Please try again.',
        'delete'    => 'There was an issue deleting the member. Please try again.',
        'unsuspend' => 'There was an issue unsuspending the member. Please try again.'
    ),

);
