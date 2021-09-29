<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/app.css">
	<title>Document</title>
</head>
<body>
	<div></div>       
	<table class="table table-head-fixed">
	    <thead>
	    	<tr>
	    		<td colspan="5"><h2>CEM de Médiègue</h2></td>
	    	</tr>
	        <tr>
	            <th style="width:10%;">#</th>
	            <th style="width:30%;">Nom complet</th>
	            <th style="width:20%;">Né le</th>
	            <th style="width:25%;">A</th>
	            <th style="width:15%;">Classe</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($inscriptions as $inscription)
	            <tr>
	                <td>{{ $inscription->student->id }}</td>
	                <td>{{ $inscription->student->nomComplet() }}</td>
	                <td class="text-left">{{ $inscription->student->dateNaissance->format('d/m/Y') }}</td>
	                <td>{{ $inscription->student->lieuNaissance}}</td>
	                <td>{{ $inscription->classeRoom->libClasse }} </td>
	            </tr>
	        @endforeach
	        <tr>
	        	<td colspan="5"><h3>Le Principal</h3></td>
	        </tr>
	    </tbody>
	</table>
</body>
</html>