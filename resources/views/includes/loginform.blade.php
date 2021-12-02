<br><br>
<center>
    <span style="font-size: 72pt; color: #0066ff; font-family: Calibri;">
        <strong>PUAIS</strong>
    </span>
    <br><br>
    <form action="{{ URL::to('logincheck')}}" method="post">
        {{ csrf_field() }}
        <table style="border-right: gray 1px solid; border-top: gray 1px solid; border-left: gray 1px solid; border-bottom: gray 1px solid;">
            <tbody>
                <tr>
                    <td style="font-weight: bold; font-size: 10pt; width: 30px; color: #000000; font-family: Palatino Linotype; height: 35px; text-align: right"> </td>
                    <td style="text-align: left; height: 35px; font-size: 10pt; color: #000000; font-weight:bold;font-family: Palatino Linotype; width: 79px;">ID</td>
                    <td style="height: 35px; width: 21px;">
                        <strong>:</strong>
                    </td>
                    <td style="text-align: right; height: 35px; width: 256px;" colspan="2">
                        <input name="txt_username" type="text" id="txt_username" style="border-color:Blue;border-width:1px; border-style:Solid;font-family:Palatino Linotype;font-size:9pt;width:246px;">
                    </td>
                    <td colspan="1" style="width: 31px; height: 35px; text-align: right"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 10pt; width: 30px; color: #000000; font-family: Palatino Linotype; height: 35px; text-align: right"> </td>
                    <td style="text-align: left; height: 35px; font-size: 10pt; color: #000000; font-weight:bold;font-family: Palatino Linotype; width: 79px;">Password</td>
                    <td style="height: 35px; width: 21px;">
                        <strong>:</strong>
                    </td>
                    </td>
                    <td style="text-align: right; width: 256px; height: 35px;" colspan="2">
                        <input name="txt_password" type="password" id="txt_password" style="border-color:Blue;border-width:1px;border-style:Solid;font-family:Palatino Linotype;font-size:9pt;width:246px;">
                    </td>
                    <td colspan="1" style="width: 31px; height: 35px; text-align: right">
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="height: 48px; text-align: center">
                        <input type="submit" name="btn_login" value="Sign In" id="btn_login" class="buttonstyle1" style="height:25px;width:70px;">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</center>
<br><br>
