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
    	<tr>
    	  <td>{{$ret[0]}}</td>
          <td>{{$ret[1]}}</td>
          <td>{{$ret[2]}}</td>
       </tr>
       @endforeach
    </tbody>
</table>
</center><br>

<p style="color:#f00;">~~~~Eja nla Trojan~~~~</p>