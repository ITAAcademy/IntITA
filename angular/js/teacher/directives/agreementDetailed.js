"use strict";

angular
    .module('teacherApp')
    .directive('agreementDetailed', ['agreementsService','lodash','studentService', agreementDetailed]);

function agreementDetailed(agreements, _, studentService) {
    function link($scope, element, attrs) {
        agreements
            .getById({id: attrs.agreementId || 0})
            .$promise
            .then(function (data) {
                $scope.agreementData = data;
                $scope.agreementData.currentDate = currentDate;
                var paid=0;
                $scope.agreementRequestStatus($scope.agreementData.id);
                if($scope.agreementData.actualWrittenAgreement){
                    $scope.writtenAgreementStatus($scope.agreementData.actualWrittenAgreement);
                }
                //get paid sum for agreement
                if($scope.agreementData.internalPayment){
                    for (var index = 0; index < Object.keys($scope.agreementData.internalPayment).length; ++index){
                        paid = paid+Number($scope.agreementData.internalPayment[index].summa);
                    }
                }
                $scope.agreementData.paidAmount=paid.toFixed(2);
                //get agreement payment_date and expiration_date
                if($scope.agreementData.invoice){
                    for (var index = 0; index < Object.keys($scope.agreementData.invoice).length; ++index) {
                        var invoicePaid=0;
                        _.filter($scope.agreementData.internalPayment, ['invoice_id', $scope.agreementData.invoice[index].id]).forEach(function (pay) {
                            invoicePaid = invoicePaid+Number(pay.summa);
                        });
                        if(invoicePaid<$scope.agreementData.invoice[index].summa){
                            $scope.agreementData.payment_date=$scope.agreementData.invoice[index].payment_date;
                            $scope.agreementData.expiration_date=$scope.agreementData.invoice[index].expiration_date;
                            break;
                        }
                    }
                }
            });

        $scope.cancel = function (id) {
            bootbox.confirm('Ви впевнені, що хочете скасувати договір?', function(result) {
                if(result){
                    return agreements
                        .cancel({id: id})
                        .$promise
                        .then(function () {
                            location.reload();
                        });
                }
            });
        };

        $scope.agreementRequestStatus = function (id) {
            studentService
                .writtenAgreementRequestStatus({'id':id})
                .$promise
                .then(function (response) {
                    switch (response.data) {
                        case 'empty':
                            $scope.writtenAgreementRequestStatus = 'запит на перевірку не відправлено';
                            break;
                        case null:
                            $scope.writtenAgreementRequestStatus = 'відправлено на перевірку';
                            break;
                        case 0:
                            $scope.writtenAgreementRequestStatus = 'запит відхилено';
                            break;
                        case 1:
                            $scope.writtenAgreementRequestStatus = 'затверджено';
                            break;
                    }
                });
        };

        $scope.writtenAgreementStatus = function (agreement) {
            $scope.writtenAgreementStatuses =[];
            if(agreement.actual==1){
                if(agreement.checked_by_accountant) $scope.writtenAgreementStatuses.push('затверджено бухгалтером');
                if(agreement.checked_by_user) $scope.writtenAgreementStatuses.push('затверджено користувачем');
                if(agreement.checked) $scope.writtenAgreementStatuses.push('затверджено обома стронами');
            }else if(agreement.actual==2){
               $scope.writtenAgreementStatuses.push('договір роздрукований');
            }else{
                $scope.writtenAgreementStatuses.push('не актуальний договір');
            }

        };
    }

    return {
        link: link,
        templateUrl: basePath+'/angular/js/teacher/templates/accountancy/agreementDetailed.html'
    }
}

