function performAction({
  url,
  method,
  dataCustom,
  confirmTitle,
  confirmText,
  failureTitle,
  idBtn,
  confirmButtonText,
}) {
  $(idBtn).html("ĐANG XỬ LÝ").prop("disabled", true);
  Swal.fire({
    title: confirmTitle,
    text: confirmText,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: confirmButtonText,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: url,
        method: method,
        data: dataCustom,
        dataType: "json",
        success: function (response) {
          console.log(response);
          if (response.status === "success") {
            Swal.fire({
              title: response.status,
              text: response.message,
              icon: "success",
            }).then((rs) => {
              location.reload();
            });
          } else {
            Swal.fire({
              title: response.status,
              text: response.message,
              icon: "error",
            });
            $(idBtn).html("Lưu").prop("disabled", false);
          }
        },
        error: function (response) {
          console.log(response);
          Swal.fire({
            title: failureTitle,
            text: "Có lỗi xảy ra, vui lòng thử lại.",
            icon: "error",
          });
          $(idBtn).html(confirmButtonText).prop("disabled", false);
        },
      });
    } else {
      $(idBtn).html(confirmButtonText).prop("disabled", false);
    }
  });
}

function performActionForm({
  url,
  method,
  dataCustom,
  confirmTitle,
  confirmText,
  failureTitle,
  idBtn,
  confirmButtonText,
}) {
  $(idBtn).html("ĐANG XỬ LÝ").prop("disabled", true);
  Swal.fire({
    title: confirmTitle,
    text: confirmText,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: confirmButtonText,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: url,
        method: method,
        data: dataCustom,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
          console.log(response);
          if (response.status === "success") {
            Swal.fire({
              title: response.status,
              text: response.message,
              icon: "success",
            }).then((rs) => {
              location.reload();
            });
          } else {
            Swal.fire({
              title: response.status,
              text: response.message,
              icon: "error",
            });
            $(idBtn).html("Lưu").prop("disabled", false);
          }
        },
        error: function (response) {
          console.log(response);
          Swal.fire({
            title: failureTitle,
            text: "Có lỗi xảy ra, vui lòng thử lại.",
            icon: "error",
          });
          $(idBtn).html(confirmButtonText).prop("disabled", false);
        },
      });
    } else {
      $(idBtn).html(confirmButtonText).prop("disabled", false);
    }
  });
}
