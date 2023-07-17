<?php

//delete session
unset($_SESSION['is_login']);
unset($_SESSION['user_login']);

echo "This is page logout";

redirect_to('?mod=user&act=login');
