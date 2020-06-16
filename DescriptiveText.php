<?php

declare(strict_types=1);
require_once 'IQuizzVisitor.php';

class DescriptiveText extends QuizzElement
{
  /**
   * Description
   *
   * @var string
   */
  protected $message;

  public function __construct($msg = '')
  {
    parent::__construct(0);
    $this->message = $msg;
  }

  public function getMessage()
  {
    return $this->message;
  }

  public function setMessage($msg)
  {
    $this->message = $msg;
    return $this;
  }

  /**
   * Affecte l'affichage au visitor.
   *
   * @param IQuizzVisitor $v
   * @return void
   */
  public function render(IQuizzVisitor $v)
  {
    $v->renderDescriptiveText($this);
  }
}
