<?php
namespace Netpok\Database\Support;

class DeleteRestrictionException extends \Exception {
  public function getStatusCode()
  {
    return 403;
  }
}