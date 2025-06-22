<x-app-layout>
    <x-slot name="header">
     
    </x-slot>     
<br>
    <div class="py-8 flex justify-center"> 
        <div class="w-full max-w-[600px]">   	
			<h1 style="text-align: center;"><b>API checking</b></h1>
			<table style="border:2px solid black; ">
				<tr >
					<td style="border:2px solid black">id</td>
					<td style="border:2px solid black">type</td>
					<td style="border:2px solid black">setup</td>
					<td style="border:2px solid black">punchline</td>
				</tr>
				<tr>
					<td style="border:2px solid black">{{$data['id']}}</td>
					<td style="border:2px solid black">{{$data['type']}}</td>
					<td style="border:2px solid black">{{$data['setup']}}</td>
					<td style="border:2px solid black">{{$data['punchline']}}</td>
				</tr>
			</table>
		</div>
	</div>
</x-app-layout>


