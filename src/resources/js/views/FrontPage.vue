<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 offset-md-1">

                <img src="https://www.publicdomainpictures.net/pictures/190000/velka/sloth-drawing.jpg"
                     class="mx-auto d-block header-img" width="300"/>
                <p class="lead text-center">
                    Enter your Twitter handle to find out if you're worthy of joining the Business Sloth Enterprise.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 offset-md-1">
                <b-form @submit="onSubmit">
                    <b-form-group :state="formState" invalid-feedback="No such sloth found!">
                    <b-input-group prepend="@" size="lg" class="mb-2 mr-sm-2 mb-sm-0">
                        <b-input id="twitter-name"  autofocus v-model="form.name" placeholder="SQRooted"/>
                        <b-button type="submit" size="lg" variant="primary">Submit CV</b-button>
                    </b-input-group>
                    </b-form-group>
                </b-form>
            </div>
        </div>



        <div class="row justify-content-center" v-if="grade && !loading">
            <div class="col-md-10 offset-md-1">
                <tweet-score :grade="grade"></tweet-score>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        data() {
            return {
                form: {
                    name: '',
                },
                loading: false,
                grade: null,
                formState: null
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault();
                this.loading = true;
                var that = this;
                axios.get('/api/grade/'+this.form.name)
                    .then((response) => {
                        that.grade = response.data.data;
                        that.loading = false;
                        that.formState = null;
                    }, (error)  =>  {
                        that.loading = false;
                        that.formState = 'invalid';
                        that.grade = null;
                    });
            }
        }
    }
</script>
