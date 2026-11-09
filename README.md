## AnyModel

### Allows creation of a Laravel Entity Model for an arbitrary table or view

Allow creation of Laravel Entity Model for any arbitrary table without needing to declare a Model first.

This is particuarily useful if you have a legacy application 
that uses Views and you do not wish to create a model for each view.

````php

    // return a new model built from vw_ConfirmedBookings table/view
    $Bookings =  AnyModel::table('vw_ConfirmedBookings')
                                  ->where('Confirmed',true)                                  
                                  ->orderBy('updated_at')
                                  ->get();

    // Work with model in normal way
    $Bookings->each(function($Booking){
        AddName( $Booking->name);
    });
````

### Installation

````
 composer require tobya/anymodel
````
### Concerns

Anymodel package comes with some concerns

> use HasNoTable;

> use BasedonView;

HasNoTable should be used for a model where you do not wish for a save to be possible.
This is useful for Views. BasedonView is an alias for HasNoTable.

> use HasCustomPrimaryKey;

Some older tables do not use id as the primary key and the new primary key can be set on the model.
However if you call \$model->id in your code you will get a null rather than the correct
value or an exception.  This will correctly return the primaryKey value when $model->id 
is requested.