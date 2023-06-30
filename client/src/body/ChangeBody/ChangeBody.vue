<template>
    <div class="Back">
        <div class="Container">
            <div class="Board">
                <h2>
                    Đổi mật khẩu
                </h2>
                <div class="form-floating mb-3 Input">
                    <input v-model="this.userName" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" @change="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3 Input">
                    <input v-model="this.passWord" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3 Input">
                    <input v-model="this.newPassWord" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password mới</label>
                </div>
                <div class="form-floating mb-3 Input">
                    <input v-model="this.reNewPassWord" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">nhập lại Password mới</label>
                </div>
                <button class="btn btn-light btn-lg" type="submit" @click="signIn()">Đăng nhập</button>
            </div>
        </div>
    </div>
</template>
<style scoped src ="./ChangeBody.css"/>
<script src="./ChangeBody.js"></script>