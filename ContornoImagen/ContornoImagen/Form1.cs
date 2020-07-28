using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace ContornoImagen
{
    public partial class Form1 : Form
    {
        Bitmap bmp;
        public Form1()
        {
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {}

        private void button1_Click(object sender, EventArgs e)
        {
            openFileDialog1.Filter = "Archivo JPG|*.jpg|Tdos los archivos|*.*";
            openFileDialog1.ShowDialog();
            bmp = new Bitmap(openFileDialog1.FileName);
            pictureBox1.Image = bmp;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Bitmap bmp1 = new Bitmap(bmp.Width, bmp.Height);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c1 = new Color(); 
            Color c2 = new Color();
            Color c3 = new Color();
            int r = 15;
            //Trbajando solo con la intensidad .imagen en blanco y negro
            int intensidad;
            for (int i = 0; i < bmp.Width; i++)
            {
                for (int j = 0; j < bmp.Height; j++)
                {
                    c1 = bmp.GetPixel(i, j);
                    intensidad = (c1.R + c1.G + c1.B) / 3;
                    bmp1.SetPixel(i, j, Color.FromArgb(intensidad, intensidad, intensidad));
                }
            }
            //Buscando camnbios bruscos de intensidad
            for (int i = 1; i < bmp.Width; i++)
            {
                for (int j = 1; j < bmp.Height - 1; j++)
                {

                    c1 = bmp1.GetPixel(i, j);
                    c2 = bmp1.GetPixel(i, j + 1);
                    c3 = bmp1.GetPixel(i, j - 1);
                    if ((c1.R - r <= c2.R && c1.R + r >= c2.R) && (c1.R - r <= c3.R && c1.R + r >= c3.R))
                        bmp2.SetPixel(i, j, Color.FromArgb(255, 255, 255));
                    else
                        bmp2.SetPixel(i, j, Color.FromArgb(0, 0, 0));
                }
            }
            //dibujando la imagen

            pictureBox1.Image = bmp2;
     

        }


    }
}
