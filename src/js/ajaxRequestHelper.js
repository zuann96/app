function ajaxRequest(url, method, data, successCallback, errorCallback) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          successCallback(xhr.responseText);
        } else {
          errorCallback(xhr.status);
        }
      }
    };
  
    xhr.onerror = function() {
      errorCallback(xhr.status);
    };
  
    xhr.send(data);
  }
  