





<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <img src="https://i.imgur.com/B4ReozC.png" style="width: 105px;height:35px" alt="">
        <br>
        <br>
        <br>

        Hi {{$name}} ,
        <td>
            <br>

         <span style="font-weight:bold">{{$text}}</span>
            <br>
            <br>
            
         <span style="">Your password: <span style="font-weight:bold">{{$password}}</span></span>
         <br>
         <br>
            
            <a target="_blank" href="{{url('login')}}" style="background-color: #00a3ff; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-decoration: none; padding: 14px 20px; color: #ffffff; border-radius: 5px; display: inline-block; mso-padding-alt: 0;">
                <span style="mso-text-raise: 15pt;">Login</span>
            </a>
            <br>
            <br>
            <br>
            <span style="">{{$alertText}}</span>   
            <br>
            <br>
            <span> Kind Regards,Nuron</span>  
 
        </td>
    </tr>
</table>