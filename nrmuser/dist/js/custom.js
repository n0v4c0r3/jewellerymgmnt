


// file input for add products
$(document).on('change', '.file-input', function() {


var filesCount = $(this)[0].files.length;

var textbox = $(this).prev();

if (filesCount === 1) {
var fileName = $(this).val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}



if (typeof (FileReader) != "undefined") {
  var dvPreview = $("#divImageMediaPreview");
  dvPreview.html("");            
  $($(this)[0].files).each(function () {
      var file = $(this);                
          var reader = new FileReader();
          reader.onload = function (e) {
              var img = $("<img />");
              img.attr("style", "width: 50%; height:50%; padding: 10px");
              img.attr("src", e.target.result);
              dvPreview.append(img);
          }
          reader.readAsDataURL(file[0]);                
  });
} else {
  // alert("This browser does not support HTML5 FileReader.");
}


});

// datatables

  $(document).ready(function() {
  $("#example").DataTable({
    aaSorting: [],
    responsive: true,

    columnDefs: [
      {
        responsivePriority: 1,
        targets: 0
      },
      {
        responsivePriority: 2,
        targets: -1
      }
    ]
  });

  $(".dataTables_filter input")
    .attr("placeholder", "Search here...")
    .css({
      width: "300px",
      display: "inline-block"
    });

  $('[data-toggle="tooltip"]').tooltip();
});


// password confirmation _profile
$(document).ready(function () {

    $('#upcnfpass').keyup(function () {

        var pwd = $('#upnpass').val();
        var cpwd = $('#upcnfpass').val();
        if (cpwd != pwd) {
            $('#passcnf').html('<span class="text-danger">Password Not Matching</span>');
            $("#updatepassword").attr("disabled", true);
            $("#adduser").attr("disabled", true);
            return false;
        } else if (cpwd = pwd) {
            $('#passcnf').html('Password matching');
            $("#updatepassword").attr("disabled", false);
            $("#adduser").attr("disabled", false);
            return false;
        }

    });

});