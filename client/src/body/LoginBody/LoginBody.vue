<template>
    <div class="Back">
        <div class="Container">
            <div class="Board">
                <h2>
                    Đăng nhập
                </h2>
                <div class="form-floating mb-3 Input">
                    <input v-model="this.userName" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" @change="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3 Input">
                    <input v-model="this.passWord" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="btn btn-light btn-lg" type="submit" @click="signIn()">Đăng nhập</button>
            </div>
        </div>
    </div>
</template>
<style scoped src ="./LoginBody.css"/>
<script src="./LoginBody.js"></script>