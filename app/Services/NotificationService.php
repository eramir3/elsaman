<?php

namespace App\Services;

use App\Enums\NotificationEnum;


class NotificationService
{
    public function success($object, $alertType)
    {
        $notification = [];

        switch($alertType) 
        {
            case NotificationEnum::Create:
                $notification = [
                    'message' => $object .' Created Successfully',
                    'alert_type' => NotificationEnum::Success
                ];
                break;
            case NotificationEnum::Update:
                $notification = [
                    'message' => $object .' Updated Successfully',
                    'alert_type' => NotificationEnum::Success
                ];
                break;
            case NotificationEnum::Delete:
                $notification = [
                    'message' => $object .' Deleted Successfully',
                    'alert_type' => NotificationEnum::Success
                ];
                break;
        }

        return $notification;
    }

    public function error($object, $alertType)
    {
        $notification = [];

        switch($alertType) 
        {
            case NotificationEnum::CreateError:
                $notification = [
                    'message' => $object .' Creation Failed',
                    'alert_type' => NotificationEnum::Error
                ];
                break;
            case NotificationEnum::UpdateError:
                $notification = [
                    'message' => $object .' Update Failed',
                    'alert_type' => NotificationEnum::Error
                ];
                break;
            case NotificationEnum::DeleteError:
                $notification = [
                    'message' => $object .' Deletion Failed',
                    'alert_type' => NotificationEnum::Error
                ];
                break;
        }

        return $notification;
    }

    public function custom($message, $alertType)
    {
        $notification = [];

        switch($alertType) 
        {
            case NotificationEnum::Success:
                $notification = [
                    'message' => $message,
                    'alert_type' => NotificationEnum::Success
                ];
                break;
            case NotificationEnum::Error:
                $notification = [
                    'message' => $message,
                    'alert_type' => NotificationEnum::Error
                ];
                break;
            
        }

        return $notification;
    }
}