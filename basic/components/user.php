<?php
loadUser();
if ($user)
return $user->username==LevelLookUp::admin;
return false;
}

function isAdmin(){
$user = $this->loadUser();
if ($user)
return $user->username==LevelLookUp::admin;
return false;
}
// saving logged users into a state
protected function afterLogin()
{
$this->setState(‘___uid’, $this->id);
return true;
}
// Load user model.
protected function loadUser()
{
if ( $this->_model === null ) {
$this->_model = UserAdmin::model()->findByPk( $this->getState(‘___uid’));
}
return $this->_model;
}
}