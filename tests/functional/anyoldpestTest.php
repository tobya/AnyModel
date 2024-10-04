<?php



  it('can create anymodel', function () {
    $A = \Tobya\Anymodel\AnyModel::table('tabledoesnotexist');
    expect($A)->toBeObject();
  });
