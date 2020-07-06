<?php
namespace Seshac\Shiprocket;

use Seshac\Shiprocket\Shiprocket;

echo $shiprocket = (new Shiprocket([]))->order()->hello();
