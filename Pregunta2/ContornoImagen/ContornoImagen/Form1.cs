using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace ContornoImagen {
    public partial class Form1 : Form {
        Bitmap bmp;
        int[, ] MatrizC = new int[3, 3];
        int[, ] MatrizV = new int[3, 3];
        public Form1 () {
            InitializeComponent ();
        }

        private void label1_Click (object sender, EventArgs e) { }

        private void button1_Click (object sender, EventArgs e) {
            openFileDialog1.Filter = "Archivo JPG|*.jpg|Tdos los archivos|*.*";
            openFileDialog1.ShowDialog ();
            bmp = new Bitmap (openFileDialog1.FileName);
            pictureBox1.Image = bmp;
        }

        private void button2_Click (object sender, EventArgs e) {
            Bitmap bmp1 = new Bitmap (bmp.Width, bmp.Height);
            Bitmap bmp2 = new Bitmap (bmp.Width, bmp.Height);

            int nuevopixel = 0;

            // Definiendo la matriz  Mascara de convulsion de 3x3 para contorno 
            MatrizC[0, 0] = 0;
            MatrizC[0, 1] = 1;
            MatrizC[0, 2] = 0;

            MatrizC[1, 0] = 1;
            MatrizC[1, 1] = -4;
            MatrizC[1, 2] = 1;

            MatrizC[2, 0] = 0;
            MatrizC[2, 1] = 1;
            MatrizC[2, 2] = 0;

            for (int i = 1; i < bmp.Width - 1; i++) {
                for (int j = 1; j < bmp.Height - 1; j++) {
                    // obteniendo la matriz Ventana de convulcion de 3x3
                    MatrizV[0, 0] = GetPixel (i - 1, j - 1);
                    MatrizV[0, 1] = GetPixel (i - 1, j + 0);
                    MatrizV[0, 2] = GetPixel (i - 1, j + 1);

                    MatrizV[1, 0] = GetPixel (i, j - 1);
                    MatrizV[1, 1] = GetPixel (i, j + 0);
                    MatrizV[1, 2] = GetPixel (i, j + 1);

                    MatrizV[2, 0] = GetPixel (i + 1, j - 1);
                    MatrizV[2, 1] = GetPixel (i + 1, j + 0);
                    MatrizV[2, 2] = GetPixel (i + 1, j + 1);

                    nuevopixel = productoMatrices ();

                    bmp1.SetPixel (i, j, Color.FromArgb (nuevopixel, nuevopixel, nuevopixel));
                }
            }
            // dibujando la imagen
            pictureBox1.Image = bmp1;

        }

        private int GetPixel (int i, int j) {
            // esta funcion nos ayudara solo a trabajar un una intensidad de RGB
            int intensidad;
            Color c1 = new Color ();
            c1 = bmp.GetPixel (i, j);
            intensidad = (c1.R + c1.G + c1.B) / 3;
            return intensidad;
        }
        private int productoMatrices () {
            // multiplicando la matriz 3x3
            int nuevopixel = 0;
            for (int i = 0; i < 3; i++) {
                for (int j = 0; j < 3; j++)
                    nuevopixel = nuevopixel + (MatrizC[i, j] * MatrizV[i, j]);
            }
            // nuevo pixel entre 0-255
            if (nuevopixel < 0)
                nuevopixel = 0;
            if (nuevopixel > 255)
                nuevopixel = 255;
            return nuevopixel;
        }

    }
}