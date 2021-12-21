<nav class='navbar navbar-expand-sm navbar-dark sticky-top'>
    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
        <tbody>
            <tr>
                <td style="height: 49px; text-align: left; vertical-align: top; border-bottom: #727272 2px solid;" colspan="3">
                    <img alt="Premier University" src="{{URL::to('images/puclogo.jpg')}}" style="height: 40px">
                    <span style="font-size: 12pt; color: #000000; font-family: Palatino Linotype">
                        <strong> Premier University | I Am <span style="color:Firebrick;font-weight:bold;">{{session('name')}}</span></strong>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="sticky-top" colspan="3" style="vertical-align: top; border-bottom: skyblue 2px solid; height: 30px; background-color: #003333; text-align: left">
                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%; height: 40px;">
                        <tbody>
                            <tr>
                                <td style="height: 25px;text-align:left;">
                                    &nbsp;
                                    <a href="/{{session('userrole')}}" class="btn menuoption">Home</a>
                                    <a href="/{{session('userrole')}}/editprofile" class="btn menuoption">Edit Profile</a>
                                </td>
                                <td style="height: 25px; text-align:right;">
                                    <a href="/logout" class="btn signoutbtn">Signout</a>
                                </td>
                                <td style="width: 19px; height: 25px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td rowspan="2" style="float: left;">
                    @yield('profilepicture')
                </td>
                <td style="float:left;">
                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%; height: 40px;">
                        <tbody>
                            <tr>
                                <td style="vertical-align: top; height: 25px;text-align:left;">
                                    <span style="color:DarkRed;font-family:Palatino Linotype;font-size:14pt;font-weight:bold;text-decoration:none;">{{session('name')}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;height: 25px;text-align: left">
                                    <span style="font-size: 11pt; font-family: Palatino Linotype">
                                        Department of <b>Computer Science &amp; Engineering</b></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="vertical-align: bottom; float: right;">
                    <span style="font-size: 10pt; font-family: Palatino Linotype">ID: </span>
                    <span style="color:Firebrick;font-family:Palatino Linotype;font-size:10pt;font-weight:bold;text-decoration:none;">{{session('username')}}</span>
                </td>
            </tr>
        </tbody>
    </table>
</nav>