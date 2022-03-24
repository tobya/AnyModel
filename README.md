## AnyModel

### Allows creation of a Laravel Entity Model for an arbitrary table or view

Allow creation of Laravel Entity Model for any arbitrary table without needing to declare a Model first.

This is particuarily useful if you have a legacy application 
that uses Views and you do not wish to create a model for each view.

````php

    // return a new model built from vw_ConfirmedBookings table/view
    $Bookings =  AnyModel::table('vw_ConfirmedBookings','BookingID')
                                  ->where('Confirmed',true)                                  
                                  ->orderBy('updated_at')
                                  ->get();

    // Work with model in normal way
    $Bookings->each(function($Booking){
        AddName( $Booking->name);
    });
````

### Installation

> composer require tobya/anymodel
