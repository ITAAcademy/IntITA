<div ng-controller="vacationTypesCtrl"  class="row">
	<ul class="list-inline">
        <li>
            <a type="button" class="btn btn-primary" ui-sref="vacationTypeCreate">
                Створити
            </a>
        </li>
    </ul>
    <table class="table table-condensed table-striped" ng-table="vacationTypesTable">
		<tr ng-repeat="type in $data track by $index" style="text-align: center">
		    <td title="'Номер'" sortable="'id'">
		        {{type.id}}
		    </td>
		    <td  title="'Назва_UA'" filter="{'title_ua': 'text'}" sortable="'title_ua'">
                <a ui-sref="vacationTypeUpdate({'vacation_type_id': type.id})">{{type.title_ua}}</a>
            </td>
		    <td title="'Назва_RU'"  sortable="'title_ru'">
		        {{type.title_ru}}
		    </td>
		    <td title="'Назва_EN'" sortable="'title_en'">
		        {{type.title_en}}
		    </td>
		    <td title="'Позиція'" sortable="'position'">
		        {{type.position}}
		    </td>
		    <td>
		        <a ui-sref="vacationTypeUpdate({'vacation_type_id': type.id})"><i class="fa fa-edit"></i></a><br>
		        <a ng-click="vacationTypeRemove(type.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
		    </td>
		</tr>
	</table>
</div>