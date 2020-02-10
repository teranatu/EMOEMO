<?php

function delete_form($url, $label = '削除')
{
  $form = Form::open(['method' => 'DELETE', 'url' => $url, 'class' => 'd-inline']);
  $form .= Form::submit('削除', ['class' => 'btn btn-danger']);
  $form .= Form::close();

  return $form;
}

?>