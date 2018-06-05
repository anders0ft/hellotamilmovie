<?php

namespace HTM\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HTMUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
