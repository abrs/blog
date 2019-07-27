<template>
  <form :action="action" method="POST">
    <slot name="patch"></slot>
    <div class="input-group mb-3">
      <input type='text' name="comment" class="form-control" :disabled="disabled" :value="commento">
      <div class="input-group-append">
        <a class="btn btn-primary" style="cursor:pointer; color:#FFF" @click="toggleDisabled()"><i class="material-icons" v-text="edit"></i></a>
        <button type="submit" v-if="!disabled" class="btn btn-warning"><i class="material-icons">save</i></button>
        <form :action="del" method="POST"> <slot name="delete"></slot> <i class="material-icons"><button type="submit" class="btn btn-danger">delete</button></i></form>
      </div>
    </div>
  </form>
</template>

<script>
  export default {

      props: ['action', 'commento', 'del'],

      data() {
        return {
          disabled: true,
          edit: 'edit'
        }
      },

      methods: {
        toggleDisabled() {
          this.disabled = !this.disabled;
          this.edit = this.edit == 'edit' ? 'cancel' : 'edit';
        }
    }
  }
</script>
