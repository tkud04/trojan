<center><h3>~~~~Eja nla Trojan~~~~</h3></center>
<p><strong>Details</strong></p><br>

<center>
<table>
	<thead>
		<tr>
			<th>Current Line</th>
			<th>Line Before</th>
			<th>Line After</th>
        </tr>
    </thead>
    <tbody>
    	@foreach($results as $ret)
    	<tr style="border: 1px solid #45cce7; margin-bottom: 8px;">
    	  @foreach($ret as $r)
    	     <td>{{$r}}</td>
           @endforeach
       </tr>
       @endforeach
    </tbody>
</table>
</center><br>

<p style="color:#f00;">~~~~Eja nla Trojan~~~~</p>