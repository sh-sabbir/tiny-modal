window.onload = (event) => {
	Vue.component("colorPicker", {
		props: ["value"],
		template: '<input type="text" class="colorPicker">',
		mounted: function () {
			var vm = this;
			jQuery(this.$el)
				.val(this.value)
				.wpColorPicker({
					defaultColor: this.value,
					change: function (event, ui) {
						vm.$emit("input", ui.color.toString());
					},
				});
		},
		watch: {
			value: function (value) {
				$(this.$el).wpColorPicker("color", value);
			},
		},
		destroyed: function () {
			$(this.$el).off().wpColorPicker("destroy");
		},
	});

	new Vue({
		el: "#app",
		data: {
			form_id: null,
			button_text: "Open Modal",
			p: {
				t: null,
				r: null,
				b: null,
				l: null,
			},
			m: {
				t: null,
				r: null,
				b: null,
				l: null,
			},
			color: {
				text: "#bada55",
				text_hover: "#bada55",
				bg: "",
				bg_hover: "",
				border: "#bada55",
				border_hover: "#bada55",
			},
			border_size: 0,
			border_radius: 0,
		},
		computed: {
			styles: function () {
				return {
					"--tm-color": this.color.text,
					"--tm-bg": this.color.bg,
					"--tm-p":
						this.p.t +
						"px " +
						this.p.r +
						"px " +
						this.p.b +
						"px " +
						this.p.l +
						"px",
					"--tm-m":
						this.m.t +
						"px " +
						this.m.r +
						"px " +
						this.m.b +
						"px " +
						this.m.l +
						"px",
					"--tm-b": this.border_size + "px solid " + this.color.border,
					"--tm-br": this.border_radius + "px",
				};
			},

			shortcode: function () {
				let code = '[tm id="' + this.form_id + '"';
				if (this.button_text) {
					code = code + ' text="' + this.button_text + '"';
				}
				if (this.p.t && this.p.r && this.p.b && this.p.l) {
					code =
						code +
						' padding="' +
						this.p.t +
						"|" +
						this.p.r +
						"|" +
						this.p.b +
						"|" +
						this.p.l +
						"|" +
						'"';
				}
				if (this.m.t && this.m.r && this.m.b && this.m.l) {
					code =
						code +
						' margin="' +
						this.m.t +
						"|" +
						this.m.r +
						"|" +
						this.m.b +
						"|" +
						this.m.l +
						"|" +
						'"';
				}
				if (this.color.text) {
					code = code + ' color="' + this.color.text + '"';
				}
				if (this.color.text_hover) {
					code = code + ' hcolor="' + this.color.text_hover + '"';
				}
				if (this.color.bg) {
					code = code + ' bg="' + this.color.bg + '"';
				}
				if (this.color.bg_hover) {
					code = code + ' hbg="' + this.color.bg_hover + '"';
				}
                if(this.border_size){
                    code = code + ' b="' + this.border_size + '" bcolor="' + this.color.border + '"';
                    code = code + ' hbcolor="' + this.color.border_hover + '"';
                }
                if(this.border_radius){
                    code = code + ' br="' + this.border_radius + '"';
                }
				code = code + "]";
				return code;
			},
		},
	});
};
