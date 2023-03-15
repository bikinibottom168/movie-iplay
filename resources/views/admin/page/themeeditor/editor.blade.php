<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/codeflask.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{ asset("admin/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <title>Code Editor</title>

</head>
<body style="background: #000">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-white">
                Code Editor
            </div>
            <div class="col-lg-12" style="height:50vh; width: 100%">
                <code id="custom-html" >{{  $code  }}</code>
            </div>
            <div class="col-lg-6 pt-4">
                <button class='btn btn-success' id="save">บันทึก</button>
                <a href="{{ route('admin.themeeditor') }}" class='btn btn-danger'>ยกเลิก</a>
            </div>
        </div>
    </div>
    <script>
        const flask = new CodeFlask('#custom-html', {
          language: 'js',
          lineNumbers: true,
        //   areaId: 'thing1',
        //   ariaLabelledby: 'header1',
          handleTabs: false
        });
        window['flask'] = flask;

        $(document).ready(function(){
            $("#save").click(function() {
            var data = {
                "_token": "{{ csrf_token() }}",
                "data": {
                    code: flask.getCode()
                }
            }
            $.ajax({
                type: "POST",
                url: "{{ route('code.editor.post',['file' => $file]) }}",
                data: data
            }).then(function(res){
                alert("แก้ไขสำเร็จ")
                // if(res == "1") {
                //     Swal.fire(
                //     'Saved!',
                //     '',
                //     'success'
                //     )
                // }
            })
            });
        });
    </script>
</body>
</html>