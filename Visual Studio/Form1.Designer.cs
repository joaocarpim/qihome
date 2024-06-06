namespace Transmissão_de_Dados
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.mensagemtxt = new System.Windows.Forms.TextBox();
            this.SuspendLayout();
            // 
            // mensagemtxt
            // 
            this.mensagemtxt.BackColor = System.Drawing.Color.AliceBlue;
            this.mensagemtxt.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.mensagemtxt.Font = new System.Drawing.Font("Arial", 8.25F);
            this.mensagemtxt.Location = new System.Drawing.Point(50, 12);
            this.mensagemtxt.Multiline = true;
            this.mensagemtxt.Name = "mensagemtxt";
            this.mensagemtxt.ReadOnly = true;
            this.mensagemtxt.ScrollBars = System.Windows.Forms.ScrollBars.Both;
            this.mensagemtxt.Size = new System.Drawing.Size(1030, 458);
            this.mensagemtxt.TabIndex = 0;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(9F, 20F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1129, 501);
            this.Controls.Add(this.mensagemtxt);
            this.Name = "Form1";
            this.ShowIcon = false;
            this.Text = "Monitor Serial";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox mensagemtxt;
    }
}

