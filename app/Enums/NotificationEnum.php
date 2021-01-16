<?php

namespace App\Enums;


abstract class NotificationEnum  
{   
    const Success = 'success'; 
    const Create = 'create success';
    const Update = 'update success';
    const Delete = 'delete success';
    const Error = 'error';
    const CreateError = 'create error';
    const UpdateError = 'update error';
    const DeleteError = 'deleted error';
    const Warning = 'warning';
    const Info = 'info';
}
