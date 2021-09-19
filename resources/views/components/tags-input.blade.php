@props(['name' => 'tags', 'tags' => []])

<fieldset class="form-group" x-data="tagsInput({{ json_encode($tags) }})">
  <input type="text" class="form-control" placeholder="Enter tags" x-ref="input" @keydown.enter.prevent="handleAdd">
  <div class="tag-list">
    <template x-for="tag in tags">
      <span class="tag-default tag-pill">
        <input type="hidden" :value="tag" name="{{ $name }}[]">
        <i class="ion-close-round" @click="handelRemove(tag)"></i>
        <span x-text="tag"></span>
      </span>
    </template>
  </div>
</fieldset>
<script>
  function tagsInput(tags) {
    return {
      tags,
      handleAdd(e) {
        const tag = e.target.value

        if (!this.tags.includes(tag)) {
          this.tags.push(tag)
        }

        this.$refs.input.value = ''

        return false
      },
      handelRemove(tag) {
        this.tags.splice(this.tags.indexOf(tag), 1)
      }
    }
  }
</script>
