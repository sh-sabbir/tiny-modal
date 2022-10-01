<div class="wrap">
    <h1 class="wp-heading-inline">Shortcode generator</h1>

    <style>
        #app {
            margin-top: 20px;
            display: flex;
            flex-direction: row;
            gap: 40px;
        }

        #app .block-layout {
            background: #fff;
            width: 100%;
            max-width: 600px;
            padding: 20px 30px;
        }
    </style>
    <div id="app">
        <div class="block-layout">
            <table class="form-table" role="presentation">

                <tbody>
                    <tr>
                        <th scope="row"><label for="form_id">Select Popup</label></th>
                        <td>
                            <select v-model="form_id" id="form_id">

                                <?php
                                global $post;
                                $args = array('numberposts' => -1, 'post_type' => 'modal');
                                $posts = get_posts($args);
                                foreach ($posts as $post) : setup_postdata($post); ?>
                                    <option value="<? echo $post->ID; ?>"><?php the_title(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="button_text">Trigger Text</label></th>
                        <td><input v-model="button_text" type="text" id="button_text" value="" class="regular-text"></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="">Trigger Pading</label></th>
                        <td>
                            <input v-model="p.t" type="number" value="0" class="min-attr">
                            <input v-model="p.r" type="number" value="0" class="min-attr">
                            <input v-model="p.b" type="number" value="0" class="min-attr">
                            <input v-model="p.l" type="number" value="0" class="min-attr">
                            <span>px</span>
                            <p class="description">Top, Right, Bottom, Left</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="">Trigger Margin</label></th>
                        <td>
                            <input v-model="m.t" type="number" value="0" class="min-attr">
                            <input v-model="m.r" type="number" value="0" class="min-attr">
                            <input v-model="m.b" type="number" value="0" class="min-attr">
                            <input v-model="m.l" type="number" value="0" class="min-attr">
                            <span>px</span>
                            <p class="description">Top, Right, Bottom, Left</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">Text Color</th>
                        <td>
                            <fieldset>
                                <color-picker v-model="color.text" placeholder="#ffffff"></color-picker>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">Background Color</th>
                        <td>
                            <fieldset>
                                <color-picker v-model="color.bg" placeholder="#bada55"></color-picker>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">Hover: Text Color</th>
                        <td>
                            <fieldset>
                                <color-picker v-model="color.text_hover" placeholder="#ffffff"></color-picker>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">Hover: Background Color</th>
                        <td>
                            <fieldset>
                                <color-picker v-model="color.bg_hover" placeholder="#bada55"></color-picker>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="border_size">Border</label></th>
                        <td><input v-model="border_size" type="number" step="1" min="1" id="border_size" value="0" class="small-text"> px</td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="border_radius">Border Radius</label></th>
                        <td><input v-model="border_radius" type="number" step="1" min="1" id="border_size" value="0" class="small-text"> px</td>
                    </tr>

                    <tr>
                        <th scope="row">Border Color</th>
                        <td>
                            <fieldset>
                                <color-picker v-model="color.border" placeholder="#bada55"></color-picker>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">Hover: Border Color</th>
                        <td>
                            <fieldset>
                                <color-picker v-model="color.border_hover" placeholder="#ffffff"></color-picker>
                            </fieldset>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="block-layout relative">
            <a class="trigger_preview" href="javascript:;" v-bind:style="styles">{{button_text}}</a>
            <textarea style="resize: none;" class="large-text code" readonly>{{shortcode}}</textarea>
        </div>
    </div>
</div>