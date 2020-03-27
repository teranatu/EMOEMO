'use strict'

function isCount(obj) {
  let value    = obj.value;
  let count    = 0;
  let halfSize = value.match(/[\da-zA-Z \r]/g);

  if(halfSize) {
    count = 140 - (value.length - halfSize.length / 2);
  } else {
    count = 140 - value.length;
  };

  if (count >= 0) {
    document.getElementById('textlength').textContent = '残り' + count + '文字';
    document.getElementById('textlength').style.color = '#000000';
  } else {
    document.getElementById('textlength').textContent = -1 * count + '文字削除してください';
    document.getElementById('textlength').style.color = '#ff0000';
  }
};