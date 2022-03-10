$(function() {
  var ccnum  = document.getElementById('cardNumber'),
    type   = document.getElementById('ccnum-type'),
    expiry = document.getElementById('expiry'),
    cvc    = document.getElementById('cvc'),
    submit = document.getElementById('submitme'),
    result = document.getElementById('result');

    payform.cardNumberInput(ccnum);
    payform.cvcInput(cvc);
    payform.expiryInput(expiry);

    ccnum.addEventListener('input',   updateType);

    submit.addEventListener('click', function(e) {
      e.preventDefault();
      var valid = [],
      expiryObj = payform.parseCardExpiry(expiry.value);
      valid.push(fieldStatus(ccnum,  payform.validateCardNumber(ccnum.value)));
      valid.push(fieldStatus(expiry, payform.validateCardExpiry(expiryObj)));
      valid.push(fieldStatus(cvc,    payform.validateCardCVC(cvc.value, type.innerHTML)));
      result.className = 'emoji ' + (valid.every(Boolean) ? 'valid' : 'invalid');
      if(valid[0] && valid[1] && valid[2]){
        $('#cardFrom').submit();
      }
    });

    function updateType(e) {
      var cardType = payform.parseCardType(e.target.value);
      type.innerHTML = cardType || 'invalid';
    }

    function fieldStatus(input, valid) {
      if (valid) {
        addClass(input, 'is-valid');
        removeClass(input, 'is-invalid');
      } else {
        addClass(input, 'is-invalid');
        removeClass(input, 'is-valid');
      }
      return valid;
    }

    function addClass(ele, _class) {
      if (ele.className.indexOf(_class) === -1) {
        ele.className += ' ' + _class;
      }
    }

    function removeClass(ele, _class) {
      if (ele.className.indexOf(_class) !== -1) {
        ele.className = ele.className.replace(_class, '');
      }
    }
});