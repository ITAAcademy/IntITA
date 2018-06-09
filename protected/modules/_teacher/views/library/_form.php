<ul class="list-inline">
    <li>
        <a type="button" class="btn btn-primary" ng-href="#/library/list">
            Книги
        </a>
    </li>
</ul>
<div class="addBookWrap">
    <form enctype="multipart/form-data" novalidate ng-submit="submitFormAddBook();" name="myForm" >
        <div class="form-group">
            <label for="name">Назва:</label>
            <input type="text" class="form-control" id="name" placeholder="Введіть назву книги" name="name" ng-model="formData.title">
        </div>
        <div class="form-group">
            <label for="description">Опис:</label>
            <textarea maxlength="256" class="form-control" rows="5" id="description" name="description" ng-model="formData.description" placeholder="Опис книги"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Ціна:</label>
            <input type="number" class="form-control" id="price" placeholder="Ціна" name="price" ng-model="formData.price">
        </div>
        <div class="form-group">
            <label for="price">Ціна за паперовий примірник:</label>
            <input type="number" class="form-control" id="paper_price" placeholder="Ціна за паперовий примірник" name="paper_price" ng-model="formData.paper_price">
        </div>
        <div class="form-group">
            <label for="description">Автор:</label>
            <input class="form-control" id="author" name="author" ng-model="formData.author" placeholder="Автор книги">
        </div>
        <div class="form-group">
            <label for="language">Мова:</label>
            <select class="form-control" id="language" name="language" ng-model="formData.language">
                <option>Українська</option>
                <option>Російська</option>
                <option>Англійська</option>
            </select>
        </div>
        <div class="form-group">
            <label>Категорія:</label>
            <oi-select
                    oi-options="category.title_ua for category in allCategory() track by category.id"
                    ng-model="formData.category"
                    multiple
                    multiple-placeholder="Додати категорію"
                    list-placeholder="Даної категорії не існує"
            ></oi-select>
        </div>
        <div class="form-group">
            <label for="status">Статус:</label>
            <select class="form-control" id="status" name="status" ng-model="formData.status">
                <option value="1">Активна</option>
                <option value="0">Неактивна</option>
            </select>
        </div>
        <div class="form-group">
            <a ng-if="formData.link" ng-href="/_teacher/library/library/getBook?id={{formData.id}}">Книга</a>
            <br>
            <label for="link">Виберіть файл книги:</label>
            <input type="file" nv-file-select="" uploader="bookUploader">
            <div ng-if="bookUploader.getNotUploadedItems().length">
                <div class="progress" style="margin-bottom:0">
                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': bookUploader.progress + '%' }"
                         style="width: 0%;"></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <a ng-if="formData.demo_link" ng-href="/_teacher/library/library/getBook?id={{formData.id}}">Демо книги</a>
            <br>
            <label for="link">Виберіть демо файл книги:</label>
            <input type="file" nv-file-select="" uploader="demoBookUploader">
            <div ng-if="demoBookUploader.getNotUploadedItems().length">
                <div class="progress" style="margin-bottom:0">
                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': demoBookUploader.progress + '%' }"
                         style="width: 0%;"></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <img style="width: 100px" ng-if="formData.logo" src="/files/library/{{formData.id}}/logo/{{formData.logo}}">
            <br>
            <label for="link">Виберіть фото книги:</label>
            <input type="file" nv-file-select="" uploader="logoUploader">
            <div ng-if="logoUploader.getNotUploadedItems().length">
                <div class="progress" style="margin-bottom:0">
                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': logoUploader.progress + '%' }"
                         style="width: 0%;"></div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-default" ng-disabled="myForm.$invalid" value="Зберегти книгу">
    </form>
</div>
